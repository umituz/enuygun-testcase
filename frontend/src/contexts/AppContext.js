import React from 'react';
import {TaskProvider} from "./TaskContext";

const AppProvider = ({children}) => {
        return (
            <TaskProvider>
                    {children}
            </TaskProvider>
        )
};

export default AppProvider;
