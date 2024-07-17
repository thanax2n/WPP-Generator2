import React, { useState } from 'react';
import { createRoot } from 'react-dom/client';
import './assets/scss/style.scss'

const App = () => {
  const [count, setCount] = useState(0);

  const incrementCount = () => {
    setCount(prevCount => prevCount + 1);
  };

  return (
    <div className="mx-app-wrapper">
      <h1>React app 2</h1>
      <p>This is a simple React application with a counter.</p>
      <p>Count: {count}</p>
      <button onClick={incrementCount}>Increment</button>
    </div>
  );
};

const container = document.getElementById('mxsfwnSimpleApp2');
const root = createRoot(container);
root.render(<App />);