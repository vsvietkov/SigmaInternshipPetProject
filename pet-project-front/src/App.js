import 'bootstrap/dist/css/bootstrap.css';
import {Selector} from "./components/selector";
import {Inputs2D} from "./components/default2Dinputs";
import {FormButtons} from "./components/formButtons";
import {clearErrorSpans} from "./components/tools/helpers";

import React, {useState, useEffect} from "react";

function App() {
  const [figure, setFigure] = useState('Circle');
  useEffect(clearErrorSpans, [figure])

  return (
      <div className="col-md-6 m-auto">
        <Selector onchange={(event) => setFigure(event.target.value)}/>
        <div className="card mt-2">
          <form className="card-body">
            <Inputs2D figure={figure} />
            <FormButtons />
          </form>
        </div>
      </div>
  );
}

export default App;
