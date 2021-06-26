import React from 'react';
import {
  BrowserRouter as Router,
  Switch,
  Route
} from "react-router-dom";
import Login from './Login';
import Register from './Register';
import NotFound from './NotFound';
const Pages = () => {
    return(
        <Router>
            <Switch>           
            <Route exact path="/" component= {Login} />
            <Route path = "/login" component = {Login} />
            <Route path = "/register" component = {Register} />            
            <Route path="" component={NotFound} />
            </Switch>                      
        </Router>
    );
};
export default Pages;