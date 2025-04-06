import { createSlice } from "@reduxjs/toolkit"
import { updateLocalStorage } from '@reactJs/helpers'

const initialState = {
    tasks: localStorage.getItem('reactJsAppTaskItems') ? JSON.parse(localStorage.getItem('reactJsAppTaskItems')) : []
}

const taskListSlice = createSlice( {
    name: 'react-js-task-list',
    initialState,
    reducers: {
        setTaskList: (state, action) => {

            if( ! action.payload ) return

            const { taskList } = action.payload

            state.tasks = taskList

            updateLocalStorage('reactJsAppTaskItems', state.tasks)
        },
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
    setTaskList,
    addTask,
    taskDone
} = taskListSlice.actions

export default taskListSlice.reducer