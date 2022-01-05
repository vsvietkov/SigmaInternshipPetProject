import React from "react";

export function CircleImage(props) {
  return (
    <div className="row">
      <svg viewBox="0 0 100 30">
        <circle cx="50%" cy="50%" r="10" strokeWidth="0.3" stroke="red" fill="transparent" />
      </svg>
    </div>
  )
}
