import React from "react";

export function ParallelogramImage(props) {
  return (
    <div className="row">
      <svg viewBox="0 0 100 30">
        <polygon points="20,25 40,5 80,5 60,25" style={ {fill:"rgba(0,0,0,0)", stroke: "red", strokeWidth: 0.3} } />
      </svg>
    </div>
  )
}
