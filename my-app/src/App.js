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
    
   const ValidUser = useSelector(state => state.userStatus);
  // const ValidUser = true;



    return(
 
        
        <Router>
         <div className="appDiv"> 
          {!ValidUser ?  <Demo />: <Test /> }
        
       

        
        </div>
        </Router>
 
      

      
      );
  
}


export default App;
