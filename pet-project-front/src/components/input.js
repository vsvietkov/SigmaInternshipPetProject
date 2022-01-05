import React from "react";

export function Input(props) {
  return (
    <div className="col form-group">
      <label htmlFor={props.name} className="form-label">{props.label}</label>
      <input
        id={props.name}
        name={props.name}
        type="number"
        className="form-control"
      />
      <span id={props.name + '-error'} className="text-danger input-error">{props.error}</span>
    </div>
  );
}
