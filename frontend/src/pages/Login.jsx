
import axios from 'axios';
import { useState } from 'react';

export default function Login() {
     const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [error, setError] = useState('');

    const handleLogin = async () => {
        try {
            const res = await axios.post('http://127.0.0.1:8000/api/login', { email, password });
            console.log("check ===",res)
            // Token save in localStorage
            localStorage.setItem('token', res.data.token);
            // Redirect to projects page
            window.location.href = '/projects';
        } catch (err) {
            setError(err.response?.data?.message || 'Login failed');
        }
    };
  return (
     <div style={{maxWidth:'400px', margin:'50px auto'}}>
            <h2>Login</h2>
            <input
                type="email"
                placeholder="Email"
                value={email}
                onChange={e => setEmail(e.target.value)}
                style={{width:'100%', marginBottom:'10px', padding:'8px'}}
            />
            <input
                type="password"
                placeholder="Password"
                value={password}
                onChange={e => setPassword(e.target.value)}
                style={{width:'100%', marginBottom:'10px', padding:'8px'}}
            />
            <button onClick={handleLogin} style={{width:'100%', padding:'10px'}}>Login</button>
            {error && <p style={{color:'red'}}>{error}</p>}
        </div>
  )
}






