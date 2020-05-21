import React, {Component} from 'react'
import './css/Login.css';
import LoginLogo from '../loginImages/undraw_login.png'
import Logo from '../loginImages/logo.svg'
import {login} from './UserFunctions'

class Login extends Component{
    constructor(){
        super()
        this.state = {
            email: '',
            password: '',
            errors: {}
        }
        this.onChange = this.onChange.bind(this)
        this.onSubmit = this.onSubmit.bind(this)
    }
    onChange(e) {
        this.setState({[e.target.name]: e.target.value})
    }

    onSubmit(e) {
        e.preventDefault()

        const user = {
            email: this.state.email,
            password: this.state.password
        }

        login(user).then(res => {
            if(res === true){
                this.props.history.push(`/profile`)
            }
            
        }) 
    }
    render(){
    return(
        <main className="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div className="container">
            <div className="card login-card">
                <div className="row no-gutters">
                    <div className="col-md-5">
                        <img src={LoginLogo} alt="loginlogo" className="login-card-img"/>
                    </div>
                    <div className="col-md-7">
                        <div className="card-body">
                            <div className="brand-wrapper">
                                <img src={Logo} alt="logo" className="logo"/>
                            </div>
                            <p className="login-card-description">Sign into your account</p>
                            <form noValidate onSubmit={this.onSubmit}>
                                <div className="form-group">
                                    <label htmlFor="email" className="sr-only">Email</label>
                                    <input type="email" name="email" id="email" className="form-control" placeholder="Email address" value={this.state.email} onChange={this.onChange}/>
                                </div>
                                <div className="form-group mb-4">
                                    <label htmlFor="password" className="sr-only">Password</label>
                                    <input type="password" name="password" id="password" className="form-control" placeholder="Enter Password" value={this.state.password} onChange={this.onChange}/>
                                </div>
                                <button type="submit" value="submit" className="btn btn-block login-btn mb-4">Log In</button>
                            </form>
                            <a href="#" className="forgot-password-link">Forgot password?</a>
                            <p className="login-card-footer-text">Don't have an account? <a href="#" className="text-reset"></a></p>
                            <nav className="login-card-footer-nav">
                                <a href="#"></a>
                                <a href="#">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
        // <div className="container">
        //     <div className="row">
        //         <div className="col-md-6 mt-5 mx-auto">
        //             <form noValidate onSubmit={this.onSubmit}>
        //                 <h1 className="h3 mb-3 font-weight-normal">
        //                     Please sign in
        //                 </h1>
        //                 <div className="form-group">
        //                     <label htmlFor="email">Email Address</label>
        //                     <input type="email"
        //                         className="form-control"
        //                         name="email"
        //                         placeholder="Enter Email"
        //                         value={this.state.email}
        //                         onChange={this.onChange}/>
        //                 </div>
        //                 <div className="form-group">
        //                     <label htmlFor="password">Password</label>
        //                     <input type="text"
        //                         className="form-control"
        //                         name="password"
        //                         placeholder="Enter Password"
        //                         value={this.state.password}
        //                         onChange={this.onChange}/>
        //                 </div>
        //                 <button className="btn btn-lg btn-primary btn-block">Sign In</button>
        //             </form>
        //         </div>
        //     </div>
        // </div>
    );
    }
}

export default Login