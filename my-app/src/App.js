import './App.css';
import React from 'react';
import  Hello from './Hello';
import home from './home';
import Test from './test';
import Demo from './components/Demo';
import Users from './components/Users';

import {useSelector, useDispatch} from 'react-redux';
import { BrowserRouter as Router, Link, Switch , Route } from 'react-router-dom';
import './components/css/components.css';
import './components/css/sidebar.css';




function App() {
    
  
   const dispatch = useDispatch();
    
  //const ValidUser = useSelector(state => state.userStatus);
   const ValidUser = useSelector(state => state.userInfo.loggedIn);
   var userInfor = useSelector(state => state.userInfo.user);
   var isLoggedIn = false;

   

  if(window.sessionStorage.getItem('isLoggedIn')){

     isLoggedIn =true;
     //window.sessionStorage.setItem("userInfo", userInfor);

   } else{
    
   if(ValidUser && userInfor){

    isLoggedIn =ValidUser;
    window.sessionStorage.setItem("isLoggedIn", ValidUser);
    window.sessionStorage.setItem("name", userInfor.data.firstname + " " + userInfor.data.lastname);
    }
   
   }

 

  //window.sessionStorage.setItem("userinfo", response.data);


  //const myStorage = window.sessionStorage;

  //const ValidUser = window.sessionStorage.getItem("isLoggedIn");
  //console.log(window.sessionStorage.getItem("isLoggedIn"));

   //const ValidUser = true;



    return(
 
        
        <Router>
         <div className="appDiv"> 
          {isLoggedIn ?  <Demo />: <Test /> }
        
       

        
        </div>
        </Router>
 
      

      
      );
  
}


export default App;
