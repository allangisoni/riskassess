import {useSelector, useDispatch} from 'react-redux';
import {updateUserInfo} from './index';

export const getUserInfo = () => {

	return useDispatch(updateUserInfo());

};