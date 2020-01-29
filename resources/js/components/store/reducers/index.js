import { combineReducers } from 'redux'
import {
    GET_WRESTLERS,
} from '../constants/ActionTypes'

const initialState = {
    wrestlers: []
}

const mainReducer = (state = initialState, action, payload) => {
    switch (action.type) {
        case GET_WRESTLERS:
            return {
                ...state,
                payload
            }

        default:
            return {
                ...state
            }
    }
}


const rootReducer = combineReducers({
    mainReducer
})

export default rootReducer