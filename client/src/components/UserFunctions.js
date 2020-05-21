import axios from 'axios'


export const register = newUser => {
    return axios
    .post('http://localhost:8000/api/v1/account', newUser, {
        headers: {'Content-Type': 'application/json'}
    })
    .then(res => {
        console.log(res)
    })
    .catch(err=>{
        console.log(err)
    })
}

export const login = user => {
    return axios
    .post('http://localhost:8000/api/auth/login', {
        email: user.email,
        password: user.password
    },
    {
        headers: {'Content-Type': 'application/json'}
    })
    .then(res => {
        localStorage.setItem('usertoken', res.data.access_token)
        console.log(res.data.access_token)
        return true
    })
    .catch(err=>{
        console.log(err)
    })
}

export const Profileget = () => {
    return axios
    .post(('http://localhost:8000/api/auth/me'), {}, {
        headers: {
            'Authorization': `Bearer ${localStorage.usertoken}`
        }
    })
    .then(res=>{
        console.log(res.data)
        return(res.data)
    })
    .catch(err =>{
        console.log(err)
    })
}

export const getProfile = () => {
    return axios
    .post('http://localhost:8000/api/auth/me', {
        headers: {
            'Authorization': `Bearer ${localStorage.usertoken}`
        }
    })
    .then(res => {
        console.log(res.data)
        return res.data
    })
    .catch(err=>{
        console.log(err)
        console.log(`Bearer ${localStorage.usertoken}`)
    })
}