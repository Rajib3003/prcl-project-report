<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectReportController extends Controller
{
     public function index(Request $request)
    {
     // ✅ শুধুমাত্র admin ইউজারদের অ্যাক্সেস দেওয়া হবে
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // ✅ Filter parameters
        $status = $request->query('status');
        $userId = $request->query('user_id');

        // ✅ Eager load tasks and users (avoid N+1)
        $projects = Project::with(['tasks.users'])
            ->when($status, fn($q) => $q->where('status', $status))
            ->whereHas('tasks', fn($q) => $q->where('is_completed', true)) // at least one completed
            ->has('tasks', '>=', 5) // at least 5 tasks
            ->get();

        // ✅ Collection transformation
        $report = $projects->map(function ($project) use ($userId) {
            $users = $project->tasks->flatMap->users->unique('id');

            // filter by user if provided
            if ($userId) {
                $users = $users->where('id', $userId);
            }

            return [
                'project_name' => $project->name,
                'status' => $project->status,
                'total_tasks' => $project->tasks->count(),
                'completed_tasks' => $project->tasks->where('is_completed', true)->count(),
                'users' => $users->values()->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'tasks_assigned' => $user->tasks->count(),
                    ];
                }),
            ];
        });

        return response()->json($report);
    }
}
