import React, {createContext, useContext, useEffect, useState} from 'react';
import {useDispatch, useSelector} from 'react-redux';
import {GetMethodService} from '@/services/GetMethodService';
import {setTasks} from "@/stores/actions/TaskActions";

const TaskContext = createContext();

export const useTaskContext = () => {
    return useContext(TaskContext);
};

export const TaskProvider = ({children}) => {
    const dispatch = useDispatch();
    const tasks = useSelector((state) => state.taskReducer.tasks);
    const [toastMessage, setToastMessage] = useState(null);

    useEffect(() => {
        async function fetchData() {
            try {
                const response = await GetMethodService(`tasks`);

                dispatch(setTasks( response?.data));
            } catch (error) {
                setToastMessage({message: 'Data Loading Issue', type: 'error'});
            }
        }

        fetchData();
    }, [dispatch]);

    return (
        <TaskContext.Provider
            value={{
                tasks,
                toastMessage,
            }}
        >
            {children}
        </TaskContext.Provider>
    );
};
