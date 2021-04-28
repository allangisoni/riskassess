import {useSelector, useDispatch} from 'react-redux';
import {ChangeUserStatus} from './index';

export const UpdateUserStatus = () => {

	return useDispatch(ChangeUserStatus());

};