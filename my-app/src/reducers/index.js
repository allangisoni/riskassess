import userstatusreducer from './userstatus';
import counterReducer from './counter';
import userInfoReducer from './userinforeducer';
import {combineReducers} from 'redux';



const allReducers = combineReducers({
    
    userStatus: userstatusreducer,
    counter: counterReducer,
    userInfo: userInfoReducer,
});



export default allReducers;