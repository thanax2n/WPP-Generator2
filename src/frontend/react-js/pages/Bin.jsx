import { __ } from '@wordpress/i18n'
import React, { useState, useEffect } from 'react'
import { useDispatch, useSelector } from "react-redux"
import { deleteTask, redoTask } from "@reactJs/store/slices/taskList/taskListSlice"
import SaveTasks from "@reactJs/components/SaveTasks"
import { NoTasksFound } from "@reactJs/components/NoTasksFound"

// const { __ } = wp.i18n // this for translate, because '@wordpress/i18n' does not work to display the translate text

const Bin = () => {

    const tasks = useSelector((state) => state.taskList.tasks)

    const dispatch = useDispatch()

    const handleRedo = (id) => {
        dispatch(redoTask({ taskId: id }))
    }

    const handleDelete = (id) => {

        dispatch(deleteTask({ taskId: id }))
    }

    return (
        <div className="mxsfwn-container">
            <h2 className="mxsfwn-category-title">{__('Completed Tasks', 'wpp-generator-next')}</h2>

            {
                Array.isArray(tasks) && (

                    !tasks.some(task => task.isDone === true) ? (

                        <NoTasksFound message={__('No completed tasks found', 'wpp-generator-next')} />
                    ) : (

                        <div className="mxsfwn-menu-grid">
                            {tasks.map((task, index) => (
                                task.isDone === false ? null : (
                                    <div className="mxsfwn-menu-item" key={index}>
                                        <div>
                                            <div className="mxsfwn-menu-item-title">{task.title}</div>
                                            <div className="mxsfwn-menu-item-description">{task.description}</div>
                                        </div>
                                        <div className="mxsfwn-task-footer">
                                            <button className="mxsfwn-redo-button" onClick={() => handleRedo(task.id)}>{__('Redo', 'wpp-generator-next')}</button>
                                            <button className="mxsfwn-delete-button" onClick={() => handleDelete(task.id)}>{__('Delete', 'wpp-generator-next')}</button>
                                        </div>
                                    </div>
                                )
                            ))}
                        </div>
                    )
                )
            }

            {/* Save Tasks */}
            <SaveTasks />
        </div>
    )
}

export default Bin