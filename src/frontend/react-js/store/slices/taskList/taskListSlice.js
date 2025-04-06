import { createSlice } from "@reduxjs/toolkit"
import { updateLocalStorage } from '@reactJs/helpers'

const initialState = {
    tasks: localStorage.getItem('reactJsAppTaskItems') ? JSON.parse(localStorage.getItem('reactJsAppTaskItems')) : [
        { title: 'Buy Groceries', description: 'Milk, eggs, bread, and fresh vegetables.', isDone: false },
        { title: 'Email Client', description: 'Send proposal and project updates by 4 PM.', isDone: false },
        { title: 'Workout', description: '30 minutes of cardio and strength training.', isDone: false },
    ]
}

const taskListSlice = createSlice( {
    name: 'react-js-task-list',
    initialState,
    reducers: {
        addTask: ( state, action ) => {

            if( ! action.payload ) return
            
            const { task } = action.payload

            state.tasks = [...state.tasks, task]

            updateLocalStorage('reactJsAppTaskItems', state.tasks)
        },
        taskDone: (state, action) => {
            if (!action.payload) return
            
            const { taskIndex } = action.payload

            state.tasks = state.tasks.map((task, index) => 
                index === taskIndex ? { ...task, isDone: true } : task
            )

            updateLocalStorage('reactJsAppTaskItems', state.tasks)
        },
    },
} )

export const {
    addTask,
    taskDone
} = taskListSlice.actions

export default taskListSlice.reducer