import React from "react";

export function QuadrangleImage(props) {
  return (
    <div className="row">
      <svg viewBox="0 0 100 30">
        <polygon points="20,15 40,5 70,5 70,25" style={ {fill:"rgba(0,0,0,0)", stroke: "red", strokeWidth: 0.3} } />
      </svg>
    </div>
  )
}
