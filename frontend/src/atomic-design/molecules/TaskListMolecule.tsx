import React from "react";
import { Row, Col, Card } from "react-bootstrap";
import TaskItemMolecule from "@/atomic-design/molecules/TaskItemMolecule";

const TaskListMolecule = ({ tasks }) => {
    return (
        <Row>
            {tasks?.weekly_plan?.map((weekData, index) => (
                <Col lg={12} key={index} className="mb-4">
                    <TaskItemMolecule week={weekData.week_number} tasks={Object.values(weekData.tasks)} />
                </Col>
            ))}
        </Row>
    );
};

export default TaskListMolecule;