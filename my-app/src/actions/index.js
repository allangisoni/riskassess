// ACTIONS


export  const ChangeUserStatus = () => {
    
    return{
        
        type:"ISUSERVALIDATED"
    };
};


export  const updateUserInfo = (userObj) => {
    
    return{
        
        type:"UPDATEUSERINFO",
        payload: userObj
    };
};
