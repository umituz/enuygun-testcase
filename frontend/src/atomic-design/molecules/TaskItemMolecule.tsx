import { Card } from "react-bootstrap";
import React from "react";

const TaskItemMolecule = ({ tasks }) => {
    return (
        <Card>
            <Card.Header className="bg-primary text-white">
                <h5 className="mb-0">Developer Efforts in a Week</h5>
            </Card.Header>
            <Card.Body>
                {tasks?.map((item, index) => (
                    <div key={index} className="mb-3 border p-3">
                        <h6 className="mb-0 text-primary">Developer: {item.developer}</h6>
                        <p className="mb-0">Task: {item.task}</p>
                        <p className="mb-0">Effort: {item.effort}</p>
                    </div>
                ))}
            </Card.Body>
        </Card>
    );
};

export default TaskItemMolecule;