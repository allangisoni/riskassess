import {useSelector, useDispatch} from 'react-redux';
import {ChangeUserStatus} from './index';

export const Updateuserstatus = () => {

	return useDispatch(ChangeUserStatus());

};