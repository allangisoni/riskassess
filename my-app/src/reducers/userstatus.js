
const userstatusreducer = (state=false, action) => {
    
    switch(action.type){
            
            
        case 'ISUSERVALIDATED':
            
            return !state;
            
        default :
            
            return false;
            
    }
};

export default userstatusreducer;