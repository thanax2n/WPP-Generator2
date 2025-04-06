import { __ } from '@wordpress/i18n'
import React, { useState, useEffect } from 'react'
import { useDispatch, useSelector } from "react-redux"
import { taskDone, addTask, setTaskList } from "@reactJs/store/slices/taskList/taskListSlice"
import { useGetTaskListQuery } from "@reactJs/services/TaskList"
import SaveTasks from "@reactJs/components/SaveTasks"

// const { __ } = wp.i18n // this for translate, because '@wordpress/i18n' does not work to display the translate text

const Home = () => {

    const tasks = useSelector((state) => state.taskList.tasks)

    const dispatch = useDispatch()

    const { data: taskList, isLoading, isError } = useGetTaskListQuery()

    useEffect(() => {

        if (Array.isArray(taskList?.items) && taskList?.items.length > 0) {

            // Tasks exist in the database
            dispatch(setTaskList({ taskList: taskList.items }))
        } else {

            // No tasks found in the database. Set Demo tasks
            dispatch(setTaskList({
                taskList: [
                    { title: 'Buy Groceries', description: 'Milk, eggs, bread, and fresh vegetables.', isDone: false },
                    { title: 'Email Client', description: 'Send proposal and project updates by 4 PM.', isDone: false },
                    { title: 'Workout', description: '30 minutes of cardio and strength training.', isDone: false },
                ]
            }))
        }
    }, [taskList])

    const [newTask, setNewTask] = useState({ title: '', description: '' })

    const handleDelete = (index) => {

        dispatch(taskDone({ taskIndex: index }))
    }

    const handleInputChange = (e) => {
        const { name, value } = e.target
        setNewTask({ ...newTask, [name]: value })
    }

    const handleAddTask = (e) => {

        e.preventDefault()

        if (!newTask.title.trim() || !newTask.description.trim()) {

            alert(__('Validation failed: All fields are required.', 'wpp-generator-next'))
            return
        }

        dispatch(addTask({ task: newTask }))
    }

    return (
        <div className="mxsfwn-container">
            <h2 className="mxsfwn-category-title">{__('Your Tasks', 'wpp-generator-next')}</h2>
            <div className="mxsfwn-menu-grid">
                {Array.isArray(tasks) && tasks.length > 0 ? tasks.map((task, index) => (
                    task.isDone ? null : (
                        <div className="mxsfwn-menu-item" key={index}>
                            <div>
                                <div className="mxsfwn-menu-item-title">{task.title}</div>
                                <div className="mxsfwn-menu-item-description">{task.description}</div>
                            </div>
                            <div className="mxsfwn-task-footer">
                                <button className="mxsfwn-delete-button" onClick={() => handleDelete(index)}>{__('Done', 'wpp-generator-next')}</button>
                            </div>
                        </div>
                    )
                )) : (
                    <div className="mxsfwn-menu-item mxsfwn-no-tasks-found">
                        <div className="mxsfwn-menu-item-title">{__('No tasks found', 'wpp-generator-next')}</div>
                    </div>
                )}
            </div>

            <h2 className="mxsfwn-category-title">{__('Add New Task', 'wpp-generator-next')}</h2>
            <form className="mxsfwn-menu-item" onSubmit={handleAddTask}>
                <div className="mxsfwn-menu-item-content">
                    <input
                        type="text"
                        name="title"
                        placeholder="Task Name"
                        value={newTask.title}
                        onChange={handleInputChange}
                        required
                    />
                    <textarea
                        name="description"
                        placeholder="Task Description"
                        value={newTask.description}
                        onChange={handleInputChange}
                        required
                    />
                    <button className="mxsfwn-add-to-cart" type="submit">{__('Add Task', 'wpp-generator-next')}</button>
                </div>
            </form>

            {/* Save Tasks */}
            <SaveTasks />
        </div>
    )
}

export default Home
