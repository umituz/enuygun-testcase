import React from "react";
import {Container} from "react-bootstrap";
import MainLayout from "@/layouts/MainLayout";
import TaskListOrganism from "@/atomic-design/organisms/TaskListOrganism";

const TaskListTemplate = () => {
    return (
        <MainLayout title={"Tasks"} description={"Task Description"}>
            <Container className="mt-2 minHeight pb-5">
                <TaskListOrganism/>
            </Container>
        </MainLayout>
    )
}

export default TaskListTemplate;
