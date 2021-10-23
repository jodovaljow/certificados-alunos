import { TestBed } from '@angular/core/testing';

import { GridCertificadosService } from './grid-certificados.service';

describe('GridCertificadosService', () => {
  let service: GridCertificadosService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(GridCertificadosService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
