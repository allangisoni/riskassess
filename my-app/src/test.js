import React from 'react';
//axios for api request
import Axios from 'axios';
import { BrowserRouter as Router, Link, useHistory } from 'react-router-dom';
import batlogo from './images/batlogo.png';
//import home from './home';
import {useSelector, useDispatch} from 'react-redux';
//import {ChangeUserStatus} from './actions/index';
//import {Updateuserstatus} from './actions/updateuserstatus';

function Test() {

  const dispatch = useDispatch();
  const username = React.useRef(null);
  const password = React.useRef(null);

  const validuser = useSelector(state => state.userStatus);


 function handleUserNameChange(event) {
    //console.log(this.state);
   
   const formInputData = {username: username.current.value,
                          password: password.current.value };

   console.log (formInputData.username); 
      
    
  };



 function updateui() {
   
  dispatch({type:"ISUSERVALIDATED"});

 };

function handleSubmit(event) {
 
      event.preventDefault();

      const fd = new FormData();
      fd.append('username', username.current.value);
      fd.append('password', password.current.value);
      
    
      JSON.stringify(fd);

       validateUser(fd);

      

        

};


function validateUser(mFormData){
    
       
    Axios({
            method: 'post',
            url: 'http://localhost:3000/reactlearn/my-app/src/api/user/login.php',
            data: mFormData,
            config: { headers: {'Content-Type': 'application/json'  } }
        })
        .then(function (response) {
            //handle success
           console.log(response.data);
     
           const responseJwt = response.data.jwt;

       Axios({
            method: 'post',
             url: 'reactlearn/my-app/src/api/user/validate_token.php',
            data: {jwt:responseJwt},
            config: { headers: {'Content-Type': 'application/json' }}
        })
        .then(function (response) {
          
          // User validated succefully
          
           console.log(response.data);
         
           //this.ShowHome();
          
           
             //console.log("Before"+ " " + validuser);

              updateui();

             //  {validuser ? alert("ooooo") : alert("sss") };

           // console.log("After"+ " " +validuser);
    
    
          //const isValid = useSelector(state => state.userStatus);
          
          
         
        // return true;
          
     
      }).catch(function (response) {
            //handle error
            console.log(response)
           
             // return false;
        });
     
     
            
           //alert("Alert data posted successfully");

        })
        .catch(function (response) {
            //handle error
            console.log(response);
            // return false;
        
        });
    
};





return (



<div className="testDiv">

  <h4 className="headerTitle"> Status: {validuser.toString()}</h4> 
<div  className="container-fluid headerDiv" >

   <div className="row align-items-center"  >
    
    <div className="col-md-3"> 
       <img src={batlogo} height="100px" width="160px" className="companylogo" />
    </div>
     
        <div className="col-md-6">    
            
            <h4 className="headerTitle"> SAFETY AND QUALITY TRIGGER SYSTEM </h4>

   
       </div>
       
       <div className="col-md-2"> </div>  
 
    </div>
    
    <hr className="headerHr" />
</div>




<div id="login">
              
        <div className="container">
            <div id="login-row" className="row justify-content-center align-items-center">
                <div id="login-column" className="col-md-6">
                    <div id="login-box" className="col-md-12">
                        <form id="login-form" className="form" onSubmit={handleSubmit}>
                            <h3 className="text-center text-info">Login</h3>
                            <div className="form-group">
                                <label  className="text-info">Username:</label><br/>
                                <input type="text"  onChange={handleUserNameChange}  name="username"  className="form-control" ref={username} required/>
                            </div>
                            <div className="form-group">
                                <label  className="text-info">Password:</label><br/>
                                <input type="password"  onChange={handleUserNameChange} name="password"  className="form-control " ref={password} required autoComplete="on"/>
                            </div>
                            <div className="form-group">
                                <label  className="text-info"><span>Remember me</span> <span>
                                <input id="remember-me" name="remember-me" type="checkbox"/></span></label><br/>
                                <input type="submit" name="submit" className="btn btn-info btn-md"  value="Submit" / >
                            </div>
                 
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>

</div>

      


);



}
    
export default  Test ;    

    
 
    
    







 
    

    
    
   
    


