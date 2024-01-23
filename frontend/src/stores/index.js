import thunk from "redux-thunk";
import {createStore, combineReducers, applyMiddleware} from 'redux';
import {taskReducer} from "./reducers/TaskReducer";

export const middlewares = [thunk];

const rootReducer = combineReducers({
    taskReducer: taskReducer,
});

export const createStoreWithMiddleware = applyMiddleware(...middlewares)(createStore);

export const store = createStoreWithMiddleware(rootReducer)

export default store;
