import { createSlice } from "@reduxjs/toolkit"
import { updateLocalStorage } from '@reactJs/helpers';

const initialState = {
    cartItems: localStorage.getItem('reactJsAppTaskItems') ? JSON.parse(localStorage.getItem('reactJsAppTaskItems')) : []
}

const taskListSlice = createSlice( {
    name: 'react-js-task-list',
    initialState,
    reducers: {
        addToCart: ( state, action ) => {

            if( ! action.payload ) return
            
            const { item } = action.payload

            const itemCopy = {
                ...item,
                timestamps: {
                    ...item.timestamps,
                    addedToCart: {
                        ...(item.timestamps?.addedToCart || {}),
                        utc: new Date().toISOString()
                    }
                }
            };

            state.cartItems = [...state.cartItems, itemCopy];

            updateLocalStorage('reactJsAppTaskItems', state.cartItems);
        },
        deleteFromCart: (state, action) => {
            if (!action.payload) return
            
            const { itemIndex } = action.payload

            // Validate index is within bounds
            if (itemIndex >= 0 && itemIndex < state.cartItems.length) {
                state.cartItems = state.cartItems.filter((_, index) => index !== itemIndex);
            }

            updateLocalStorage('reactJsAppTaskItems', state.cartItems);

        },
    },
} )

export const {
    addToCart,
    deleteFromCart
} = taskListSlice.actions

export default taskListSlice.reducer