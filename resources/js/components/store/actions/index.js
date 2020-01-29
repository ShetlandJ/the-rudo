import * as types from '../constants/ActionTypes'
import axios from 'axios';

export function getWrestlers(){
    debugger;
    return(dispatch) => {
        dispatch({
            type: types.GET_WRESTLERS,
            payload: data
        })
    }
}

export function setWrestlers(data) {
    return {
        type: types.GET_WRESTLERS,
        payload: data
    }
}