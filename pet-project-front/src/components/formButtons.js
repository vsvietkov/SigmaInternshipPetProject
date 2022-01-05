import React from "react";
import {clearErrorSpans} from "./tools/helpers";

export function FormButtons(props) {
  return (
    <div className="row justify-content-around mt-2">
      <button
        id="submitButton"
        className="btn btn-success col-sm-5 shadow-none"
      >Submit
      </button>
      <button
        id="clearButton"
        className="btn btn-secondary col-sm-5 shadow-none"
        type="reset"
        onClick={clearErrorSpans}
      >Clear
      </button>
    </div>
  )
}
