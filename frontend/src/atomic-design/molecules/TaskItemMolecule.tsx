import { Card, Col } from "react-bootstrap";
import React from "react";

const TaskItemMolecule = ({ week, tasks }) => {
    return (
        <Col lg={12} key={week}>
            <Card className="mb-4">
                <Card.Body>
                    <h5>Hafta {week}</h5>
                    {tasks?.map((item, index) => (
                        <div key={index}>
                            <p className="card-text">Developer: {item.developer}</p>
                            <p className="card-text">Task: {item.task}</p>
                            <p className="card-text">Effort: {item.effort}</p>
                        </div>
                    ))}
                </Card.Body>
            </Card>
        </Col>
    );
};

export default TaskItemMolecule;
