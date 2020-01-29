import {
    GET_WRESTLERS,
} from '../constants/ActionTypes'

const initialState = {
    wrestlers: []
}

export default function store(state = initialState, action, payload) {
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
