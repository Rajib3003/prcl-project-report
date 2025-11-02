import React, { useEffect, useState } from 'react';
import axios from 'axios';

const ProjectReport = () => {
    const [projects, setProjects] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    const [statusFilter, setStatusFilter] = useState('');
    const [userFilter, setUserFilter] = useState('');

    const token = localStorage.getItem('token');

    useEffect(() => {
        fetchProjects();
    }, [statusFilter, userFilter]);

    const fetchProjects = async () => {
        setLoading(true);
        setError(null);

        try {
            let url = `/api/projects/report?status=${statusFilter}&user_id=${userFilter}`;
            const res = await axios.get(url, {
                headers: { Authorization: `Bearer ${token}` }
            });
            setProjects(res.data);
        } catch (err) {
            setError(err.response?.data?.message || 'Error fetching projects');
        } finally {
            setLoading(false);
        }
    }

    if (loading) return <div>Loading...</div>;
    if (error) return <div style={{color:'red'}}>{error}</div>;

    return (
        <div className="container">
            <h2>Project Report</h2>

            <div style={{marginBottom: '10px'}}>
                <select onChange={e => setStatusFilter(e.target.value)} value={statusFilter}>
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>

                <input
                    type="number"
                    placeholder="User ID"
                    value={userFilter}
                    onChange={e => setUserFilter(e.target.value)}
                    style={{marginLeft:'10px'}}
                />
            </div>

            <table border="1" cellPadding="5" style={{width:'100%', borderCollapse:'collapse'}}>
                <thead>
                    <tr style={{background:'#eee', position:'sticky', top:0}}>
                        <th>Project Name</th>
                        <th>Status</th>
                        <th>Total Tasks</th>
                        <th>Completed Tasks</th>
                        <th>Users</th>
                    </tr>
                </thead>
                <tbody>
                    {projects.map((project, idx) => (
                        <tr key={idx} style={{background: idx%2===0 ? '#f9f9f9' : '#fff'}}>
                            <td>{project.project_name}</td>
                            <td>{project.status}</td>
                            <td>{project.total_tasks}</td>
                            <td>{project.completed_tasks}</td>
                            <td>
                                {project.users.map(user => (
                                    <div key={user.id}>
                                        {user.name} ({user.email}) - Tasks: {user.tasks_assigned}
                                    </div>
                                ))}
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default ProjectReport;
