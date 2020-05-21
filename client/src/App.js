import React, {Component} from 'react';
import {BrowserRouter, Route} from 'react-router-dom'
import Navbar from './components/Navbar'
import Landing from './components/Landing'
import Login from './components/Login'
import Register from './components/Register'
import Profile from './components/Profile'

function App(){
    return(
      <BrowserRouter>
      <div className="App">
      <Route exact path="/" component={Landing} />
      <Route exact path="/login" component={Login} />
      <Route exact path="/profile" component={Profile} />
      <Route exact path="/register" component={Register} />
    </div>
    </BrowserRouter>
      
    )
}

      // <Router>
      //   <div className="App">
      //   <Navbar />
      //   <Router exact path="/" component={Landing}/>
      //   <div className="container">
      //   <Router exact path="/register" component={Register}/>
        // <Route exact path="/login" component={Login}/>
      //   <Router exact path="/profile" component={Profile}/>
      //   </div>
      //   </div>
      // </Router>
   

export default App