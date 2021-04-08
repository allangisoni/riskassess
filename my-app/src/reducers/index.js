import userstatusreducer from './userstatus';
import counterReducer from './counter';
import {combineReducers} from 'redux';



const allReducers = combineReducers({
    
    userStatus: userstatusreducer,
    counter: counterReducer
});



export default allReducers;