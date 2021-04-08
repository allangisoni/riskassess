import React from 'react';
//axios for api request
import Axios from 'axios';
import { BrowserRouter as Router, Link, Switch , Route } from 'react-router-dom';



function Nav() {




return (

    
    <div className="navDiv"> 
    
       <nav> 
    
     <ul>
    <Link to="/components/Nav"><li> Home</li> </Link>
    <Link to="/components/Users"><li> Users</li> </Link>
     

    
     </ul>
   
    </nav> 
  
    </div>
);



}
    
export default  Nav ;    

    
 
    
    







 
    

    
    
   
    


