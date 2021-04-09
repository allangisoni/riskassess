import './App.css';
import React from 'react';
import  Hello from './Hello';
import home from './home';
import Test from './test';
import Nav from './components/Nav';
import Users from './components/Users';
import Demo from './demo';
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
        
           <Switch> 
           <Route path="/components/Nav" component={Nav} />
           <Route path="/components/Users" component={Users} />
           </Switch>
      
        
        </div>
          </Router>

        //{ValidUser ?  <div><p>loggedin</p></div>  : ' ' }
 
      

      
      );
  
}


export default App;
