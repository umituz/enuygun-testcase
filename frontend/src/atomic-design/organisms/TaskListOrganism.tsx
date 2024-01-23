import React from "react";
import {Col, Row} from "react-bootstrap";
import TaskListMolecule from "@/atomic-design/molecules/TaskListMolecule";
import {useTaskContext} from "@/contexts/TaskContext";

const TaskListOrganism = () => {
    const {
        tasks,
    } = useTaskContext();

    return (
        <Row>
            <Col lg={12}>
                <Row>
                    <TaskListMolecule tasks={tasks} />
                </Row>
            </Col>
        </Row>
    )
}

export default TaskListOrganism;