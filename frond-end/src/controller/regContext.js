import React, { createContext,Component } from "react";
import axios from 'axios'
export const regContext = createContext();

// Define the base URL
const Axios = axios.create({
    baseURL: 'http://localhost/blood-bank-arambram/back-end/',
});

class RegisterAPI extends Component{

               
    registerUser = async (user) => {

        // Sending the user registration request
        const register = await Axios.post('register',{
            name:user.name,
            email:user.email,
            password:user.password 
        });

        return register.data;
    }

    render(){
        const contextValue = {                      
            registerUser:this.registerUser,
        }
        return(
            <regContext.Provider value={contextValue}>
                {this.props.children}
            </regContext.Provider>
        )
    }

}

export default RegisterAPI;

