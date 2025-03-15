import React from 'react'
import { useSearchParams } from "react-router-dom";

const Municipality = (props) => {

  useEffect(() => {
    const municipalityName = searchParams.get('name');

  }, []);

  return (
    <div>
      Ola
    </div>
  )
}

export default Municipality
