import React, { Component } from 'react'
import './css/Register.css';
import './RegisterForm/vendor/select2/select2.min.css'
import {register} from './UserFunctions'

class Register extends Component{
    constructor(){
        super()
        this.state = {
            firstName: '',
            lastName: '',
            email:'',
            phoneNumber:'',
            userType:'',
            password:''
        }
        this.onChange = this.onChange.bind(this)
        this.onSubmit = this.onSubmit.bind(this)
    }
    onChange(e) {
        this.setState({ [e.target.name]: e.target.value})
    }

    onSubmit(e) {
        e.preventDefault()

        const newUser = {
            firstName: this.state.firstName,
            lastName: this.state.lastName,
            email: this.state.email,
            phoneNumber:this.state.phoneNumber,
            userType:this.state.userType,
            password: this.state.password
        }

        register(newUser).then(res => {
            this.props.history.push(`/login`)
        }) 
    }
    render(){
    return(
      <div className="container">
            <div className="row">
                <div className="col-md-6 mt-5 mx-auto">
                    <form noValidate onSubmit={this.onSubmit}>
                        <h1 className="h3 mb-3 font-weight-normal">
                            Please sign in
                        </h1> 
                        <div className="form-group">
                            <label htmlFor="firstName">First Name</label>
                            <input type="text"
                                className="form-control"
                                name="firstName"
                                placeholder="Enter First Name"
                                value={this.state.firstName}
                                onChange={this.onChange}/>
                        </div>
                        <div className="form-group">
                            <label htmlFor="lastName">Last Name</label>
                            <input type="text"
                                className="form-control"
                                name="lastName"
                                placeholder="Enter LastName"
                                value={this.state.lastName}
                                onChange={this.onChange}/>
                        </div>
                        <div className="form-group">
                            <label htmlFor="phone">Phone Number</label>
                            <input type="text"
                                className="form-control"
                                name="phoneNumber"
                                placeholder="Enter Phone Number"
                                value={this.state.phoneNumber}
                                onChange={this.onChange}/>
                        </div>
                        <div className="form-group">
                            <label htmlFor="email">Email Address</label>
                            <input type="email"
                                className="form-control"
                                name="email"
                                placeholder="Enter Email"
                                value={this.state.email}
                                onChange={this.onChange}/>
                        </div>
                        <div className="form-group">
                            <label htmlFor="password">Password</label>
                            <input type="text"
                                className="form-control"
                                name="password"
                                placeholder="Enter Password"
                                value={this.state.password}
                                onChange={this.onChange}/>
                        </div>
                        <div className="input-group">
                  <label className="label">Customer/Shop</label>
                  <div className="rs-select2 js-select-simple select--no-search">
                    <select name="subject">
                      <option disabled="disabled" selected="value" id="usertype">Choose option</option>
                      <option>Customer</option>
                      <option>Shop</option>
                    </select>
                    <div className="select-dropdown" />
                  </div>
                </div>
                        <button className="btn btn-lg btn-primary btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
      // <div className="page-wrapper bg-gra-02 p-t-130 p-b-100">
      //   <div className="wrapper wrapper--w680">
      //     <div className="card card-4">
      //       <div className="card-body">
      //         <h2 className="title">BERASKU Registration Form</h2>
      //         <form id="regis-form">
      //           <div className="row row-space">
      //             <div className="col-2">
      //               <div className="input-group">
      //                 <label className="label">First name</label>
      //                 <input className="input--style-4" type="text" id="first_name" />
      //               </div>
      //             </div>
      //             <div className="col-2">
      //               <div className="input-group">
      //                 <label className="label">Last name</label>
      //                 <input className="input--style-4" type="text" id="last_name" />
      //               </div>
      //             </div>
      //           </div>
      //           <div className="row row-space">
      //             <div className="col-2">
      //               <div className="input-group">
      //                 <label className="label">Email</label>
      //                 <input className="input--style-4" type="text" id="email" />
      //               </div>
      //             </div>
      //             <div className="col-2">
      //               <div className="input-group">
      //                 <label className="label">Phone Number</label>
      //                 <input className="input--style-4" type="text" id="phone" />
      //               </div>
      //             </div>
      //           </div>
      //           <div className="row row-space">
      //             <div className="col-2">
      //               <div className="input-group">
      //                 <label className="label">Username</label>
      //                 <input className="input--style-4" type="text" id="username" />
      //               </div>
      //             </div>
      //             <div className="col-2">
      //               <div className="input-group">
      //                 <label className="label">Password</label>
      //                 <input className="input--style-4" type="text" id="password" />
      //               </div>
      //             </div>
      //           </div>
                // <div className="input-group">
                //   <label className="label">Customer/Shop</label>
                //   <div className="rs-select2 js-select-simple select--no-search">
                //     <select name="subject">
                //       <option disabled="disabled" selected="selected" id="usertype">Choose option</option>
                //       <option>Customer</option>
                //       <option>Shop</option>
                //     </select>
                //     <div className="select-dropdown" />
                //   </div>
                // </div>
      //           <div className="p-t-15">
      //             <button className="btn btn--radius-2 btn--blue" type="submit" value="submit">Submit</button>
      //           </div>
      //         </form>
      //       </div>
      //     </div>
      //   </div>
      // </div>
    );
    }
}

export default Register;