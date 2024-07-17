import React, { useState } from 'react';
import ReactDOM from 'react-dom';

const App = () => {
  const [count, setCount] = useState(0);

  const incrementCount = () => {
    setCount(prevCount => prevCount + 1);
  };

  return (
    <div>
      <h1>Hello, Webpack and React!</h1>
      <p>This is a simple React application with a counter.</p>
      <p>Count: {count}</p>
      <button onClick={incrementCount}>Increment</button>
    </div>
  );
};

ReactDOM.render(<App />, document.getElementById('mxsfwnSimpleApp'));