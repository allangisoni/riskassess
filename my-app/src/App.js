import logo from './logo.svg';
import './App.css';
import React from 'react';
import  Hello from './Hello';
import home from './home';
import Test from './test';
import {useSelector, useDispatch} from 'react-redux';




function App() {
    
  
   const dispatch = useDispatch();


    return(
         
        // <Hello />

      <Test /> 
      

      
      );
  
}


export default App;
