

const userInfoReducer = (state ={}, action) => {
    

    
    switch(action.type){
            
            
        case 'UPDATEUSERINFO':
            
            return {
                
                ...state,
                user:action.payload,
                loggedIn:true
                   }
            
        case 'LOGOUT':
            
            return {
                
                ...state,
                user:{},
                loggedIn:false
                   }    
            
        default :
            
            return state;
            
    }
};

export default userInfoReducer;