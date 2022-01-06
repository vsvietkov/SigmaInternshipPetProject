import React from "react";

export function TrapezoidImage(props) {
  return (
    <div className="row">
      <svg viewBox="0 0 100 30">
        <polygon points="20,25 40,5 60,5 80,25" style={ {fill:"rgba(0,0,0,0)", stroke: "red", strokeWidth: 0.3} } />
      </svg>
    </div>
  )
}
