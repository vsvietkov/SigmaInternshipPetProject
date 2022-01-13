import React from "react";

export function Input(props) {
  return (
    <div className="col form-group">
      <label htmlFor={props.name} className="form-label">{props.label}</label>
      <input
        id={props.id}
        name={props.name}
        type="text"
        className={"form-control " + props.className}
        autoComplete={'off'}
      />
      <span id={props.name + '-error'} className="text-danger input-error">{props.error}</span>
    </div>
  );
}
