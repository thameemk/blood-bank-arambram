import React from 'react';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";
// import Home from './home';
import Login from './Login';
import Signup from './Signup';
const Pages = () => {
    return(
        <Router>
            <Route exact path="/" component= {Login} />
            <Route path = "/login" component = {Login} />
            <Route path = "/signup" component = {Signup} />
        </Router>
    );
};
export default Pages;