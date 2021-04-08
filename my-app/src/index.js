import 'bootstrap/dist/css/bootstrap.css';
// Put any other imports below so that CSS from your
// components takes precedence over default styles.
import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';


import {createStore} from 'redux';
import {Provider, useSelector, useDispatch} from 'react-redux';
import allReducers from './reducers';
//import userstatusreducer from './reducers/userstatus';


// GLOBALIZED STORE

const store = createStore(allReducers,
 window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__());




//store.subscribe( () => console.log(store.getState()));





//DISPATCH

//store.dispatch(changeuserstatus);

 //<React.StrictMode>

// </React.StrictMode>,
ReactDOM.render(
 
    <Provider store={store}> 
    <App />
    </Provider >,
    

  document.getElementById('root')
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
