import React from "react";
import {Row} from "react-bootstrap";
import TaskItemMolecule from "@/atomic-design/molecules/TaskItemMolecule";

const TaskListMolecule = ({ tasks }) => {
    return (
        <Row>
            {tasks?.weekly_plan?.map((weekData, index) => (
                <TaskItemMolecule key={index} week={index + 1} tasks={weekData[1]} />
    ))}

        </Row>
    )
}

export default TaskListMolecule;